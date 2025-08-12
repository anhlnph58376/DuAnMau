<?php require_once './views/admin/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý khuyến mãi</h3>
                    <div class="card-tools">
                        <a href="?url=admin/khuyen-mai/create" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Thêm khuyến mãi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Mô tả</th>
                                    <th>Giảm (%)</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($khuyen_mai)): ?>
                                    <?php foreach ($khuyen_mai as $km): ?>
                                        <?php
                                        $today = date('Y-m-d');
                                        $status = '';
                                        $statusClass = '';
                                        if ($today < $km['ngay_bat_dau']) {
                                            $status = 'Chưa bắt đầu';
                                            $statusClass = 'badge-warning';
                                        } elseif ($today > $km['ngay_ket_thuc']) {
                                            $status = 'Đã kết thúc';
                                            $statusClass = 'badge-danger';
                                        } else {
                                            $status = 'Đang diễn ra';
                                            $statusClass = 'badge-success';
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $km['id'] ?></td>
                                            <td><?= htmlspecialchars($km['ten']) ?></td>
                                            <td><?= htmlspecialchars(substr($km['mo_ta'], 0, 50)) ?>...</td>
                                            <td><?= $km['giam_phan_tram'] ?>%</td>
                                            <td><?= date('d/m/Y', strtotime($km['ngay_bat_dau'])) ?></td>
                                            <td><?= date('d/m/Y', strtotime($km['ngay_ket_thuc'])) ?></td>
                                            <td>
                                                <span class="badge <?= $statusClass ?>"><?= $status ?></span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="?url=admin/khuyen-mai/manage-products/<?= $km['id'] ?>" 
                                                       class="btn btn-info btn-sm" title="Quản lý sản phẩm">
                                                        Quản lý sản phẩm</i>
                                                    </a>
                                                    <a href="?url=admin/khuyen-mai/edit/<?= $km['id'] ?>" 
                                                       class="btn btn-warning btn-sm" title="Sửa">Sửa</i>
                                                    </a>
                                                    <a href="?url=admin/khuyen-mai/delete/<?= $km['id'] ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?')"
                                                       title="Xóa">
                                                        Xóa
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Không có khuyến mãi nào</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once './views/admin/layouts/footer.php'; ?>
