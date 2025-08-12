<?php require_once './views/admin/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý sản phẩm - <?= htmlspecialchars($khuyen_mai['ten']) ?></h3>
                    <div class="card-tools">
                        <a href="?url=admin/khuyen-mai" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-check-circle"></i> Sản phẩm trong khuyến mãi
                                        <span class="badge badge-light ml-2"><?= count($products_in_promotion) ?></span>
                                    </h5>
                                </div>
                                <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                                    <?php if (!empty($products_in_promotion)): ?>
                                        <?php foreach ($products_in_promotion as $product): ?>
                                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                                <div class="flex-grow-1">
                                                    <strong><?= htmlspecialchars($product['ten']) ?></strong>
                                                    <br>
                                                    <small class="text-muted">
                                                        Giá: <?= number_format($product['gia']) ?>đ
                                                    </small>
                                                </div>
                                                <form method="POST" action="?url=admin/khuyen-mai/remove-product" class="d-inline">
                                                    <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">
                                                    <input type="hidden" name="khuyen_mai_id" value="<?= $khuyen_mai['id'] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi khuyến mãi?')">Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="text-center text-muted py-4">
                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                            <p>Chưa có sản phẩm nào trong khuyến mãi này</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-plus-circle"></i> Sản phẩm có thể thêm
                                        <span class="badge badge-light ml-2"><?= count($products_not_in_promotion) ?></span>
                                    </h5>
                                </div>
                                <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                                    <?php if (!empty($products_not_in_promotion)): ?>
                                        <?php foreach ($products_not_in_promotion as $product): ?>
                                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                                <div class="flex-grow-1">
                                                    <strong><?= htmlspecialchars($product['ten']) ?></strong>
                                                    <br>
                                                    <small class="text-muted">
                                                        Giá: <?= number_format($product['gia']) ?>đ
                                                        <?php if ($product['ten_loai']): ?>
                                                            | <?= htmlspecialchars($product['ten_loai']) ?>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                                <form method="POST" action="?url=admin/khuyen-mai/add-product" class="d-inline">
                                                    <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">
                                                    <input type="hidden" name="khuyen_mai_id" value="<?= $khuyen_mai['id'] ?>">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        Thêm khuyễn mãi
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="text-center text-muted py-4">
                                            <i class="fas fa-check-circle fa-3x mb-3"></i>
                                            <p>Tất cả sản phẩm đã được thêm vào khuyến mãi</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h5><i class="fas fa-info-circle"></i> Thông tin khuyến mãi</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Tên:</strong> <?= htmlspecialchars($khuyen_mai['ten']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Giảm:</strong> <?= $khuyen_mai['giam_phan_tram'] ?>%
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Từ:</strong> <?= date('d/m/Y', strtotime($khuyen_mai['ngay_bat_dau'])) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Đến:</strong> <?= date('d/m/Y', strtotime($khuyen_mai['ngay_ket_thuc'])) ?>
                                    </div>
                                </div>
                                <?php if ($khuyen_mai['mo_ta']): ?>
                                    <div class="mt-2">
                                        <strong>Mô tả:</strong> <?= htmlspecialchars($khuyen_mai['mo_ta']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once './views/admin/layouts/footer.php'; ?>
