from rest_framework.views import APIView
from rest_framework.response import Response
from django.db.models import Sum, Count
from django.db.models.functions import ExtractHour, ExtractWeekDay, ExtractMonth
from .models import Transactions, Products # Nama model hasil inspectdb

class SalesAnalyticsView(APIView):
    def get(self, request):
        admin_id = request.query_params.get('admin_id')
        filter_type = request.query_params.get('type', 'hour')

        # 1. Pastikan queryset dasar didefinisikan terlebih dahulu
        query = Transactions.objects.filter(user__admin_id=admin_id)

        # 2. Gunakan satu variabel konsisten (misal: data_query) untuk semua kondisi
        if filter_type == 'hour':
            data_query = query.annotate(label=ExtractHour('created_at'))
        elif filter_type == 'week':
            data_query = query.annotate(label=ExtractWeekDay('created_at'))
        else:
            data_query = query.annotate(label=ExtractMonth('created_at'))

        # 3. Sekarang data_query sudah pasti ada, baru lakukan agregasi
        stats = data_query.values('label').annotate(total_sales=Sum('total')).order_by('label')

        # Mencari Barang Terlaris
        top_product = query.values('product__nama_produk').annotate(
            qty=Count('id')).order_by('-qty').first()

        explanation = self.generate_ai_reason(stats, top_product, filter_type)

        return Response({
            "labels": [d['label'] for d in stats],
            "values": [float(d['total_sales']) for d in stats],
            "top_item": top_product['product__nama_produk'] if top_product else "None",
            "chatbot_says": explanation
        })

    def generate_ai_reason(self, stats, top_product, filter_type):
        if not stats: return "Belum ada data untuk dianalisis."
        
        peak = max(stats, key=lambda x: x['total_sales'])
        item = top_product['product__nama_produk']
        
        # Logika chatbot sederhana untuk menjelaskan "Mengapa"
        reasons = {
            "hour": f"Penjualan memuncak pada jam {peak['label']}:00. Ini biasanya terjadi karena jam makan siang/istirahat.",
            "week": f"Hari ke-{peak['label']} adalah titik tertinggi minggu ini. Stok '{item}' harus ditambah di hari sebelumnya.",
            "month": f"Bulan ke-{peak['label']} menunjukkan tren naik. Produk '{item}' paling berkontribusi pada omzet."
        }
        return reasons.get(filter_type, "Tren stabil.")