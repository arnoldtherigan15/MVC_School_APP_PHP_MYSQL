<div class="container mt-5">
    <h1>List mahasiswa</h1>

    <div class="row">
        <div class="col-6">
            <?php foreach($data["mahasiswa"] as $user):?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $user["name"]; ?>
                        <a href="<?= BASEURL?>/Mahasiswa/detail/<?= $user['id'] ?>" class="badge badge-primary">detail</a>
                    </li>
                </ul>
            <?php endforeach?>
        </div>
    </div>
</div>
