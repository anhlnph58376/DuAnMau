<?php require_once './views/admin/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thêm khuyến mãi mới</h3>
                    <div class="card-tools">
                        <a href="?url=admin/khuyen-mai" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                <form action="?url=admin/khuyen-mai/store" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ten_khuyen_mai">Tên khuyến mãi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ten" name="ten" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="giam_phan_tram">Giảm giá (%) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="giam_phan_tram" name="giam_phan_tram" 
                                           min="1" max="100" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="mo_ta">Mô tả</label>
                            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" 
                                      placeholder="Nhập mô tả chi tiết về khuyến mãi..."></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ngay_bat_dau">Ngày bắt đầu <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ngay_ket_thuc">Ngày kết thúc <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> Lưu khuyến mãi</button>
                        <a href="?url=admin/khuyen-mai" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('ngay_bat_dau').setAttribute('min', today);
    document.getElementById('ngay_ket_thuc').setAttribute('min', today);
    
    // Validate end date is after start date
    document.getElementById('ngay_bat_dau').addEventListener('change', function() {
        const startDate = this.value;
        document.getElementById('ngay_ket_thuc').setAttribute('min', startDate);
    });
    
    document.getElementById('ngay_ket_thuc').addEventListener('change', function() {
        const endDate = this.value;
        const startDate = document.getElementById('ngay_bat_dau').value;
        
        if (startDate && endDate < startDate) {
            alert('Ngày kết thúc phải sau ngày bắt đầu!');
            this.value = '';
        }
    });
});
</script>

<?php require_once './views/admin/layouts/footer.php'; ?>
