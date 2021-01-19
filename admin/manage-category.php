<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

            <!-- Button to add Category --> 
            
            <a href="#" class="btn-primary">Add Category</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td>1.</td>
                    <td>Mahir Shahriar</td>
                    <td>Dev_Mahir</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Category</a>
                        <a href="#" class="btn-danger">Delete Category</a>
                    </td>
                </tr>

                <tr>
                    <td>2.</td>
                    <td>Mahir Shahriar</td>
                    <td>Dev_Mahir</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Categorie</a>
                        <a href="#" class="btn-danger">Delete Category</a>
                    </td>
                </tr>
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>