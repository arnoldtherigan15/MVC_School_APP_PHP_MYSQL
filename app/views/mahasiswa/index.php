<div class="container mt-5">
    <h1>List mahasiswa</h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-4 addModal" data-toggle="modal" data-target="#formAdd">
            Add New Student
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/Mahasiswa/search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search mahasiswa" id="keywoard" name="keywoard" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="formAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Mahasiswa/add" method="post">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                    </div>  
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" aria-describedby="emailHelp">
                    </div> 
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan">
                            <option value="Tehnik Industri">Tehnik Industri</option>
                            <option value="Tehnik Informatika">Tehnik Informatika</option>
                            <option value="Tehnik Perairan">Tehnik Perairan</option>
                            <option value="Tehnik Percintaan">Tehnik Percintaan</option>
                            <option value="Tehnik Gabut">Tehnik Gabut</option>
                        </select>
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <?php foreach($data["mahasiswa"] as $user):?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $user["name"]; ?>
                        <div>
                            <a href="<?= BASEURL?>/Mahasiswa/detail/<?= $user['id']; ?>" class="badge badge-primary mr-2">detail</a>
                            <a href="<?= BASEURL?>/Mahasiswa/edit/<?= $user['id']; ?>" class="badge badge-success mx-2 editModal" data-toggle="modal" data-target="#formAdd" data-id="<?= $user['id']; ?>">edit</a>
                            <a href="<?= BASEURL?>/Mahasiswa/delete/<?= $user['id']; ?>" onclick="return confirm('Are you sure?')" class="badge badge-danger">delete</a>
                        </div>
                    </li>
                </ul>
            <?php endforeach?>
        </div>
    </div>
</div>
