<div class="content-wrapper">


    <section class="content">

        <div class="container-fluid">
            <div class="row text-center mt-4">
                <h3 class=" mt-2 text-primary" style="width:800px; margin-left:150px">Новая задача</h3>

                <form action="NewTask" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" name="title" required class="form-control" style="width:800px; margin-left:150px" id="exampleInputEmail1" placeholder="Название" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <textarea rows="7" name="desc" required class="form-control" style="width:800px; margin-left:150px" placeholder="Подробности..."></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image" required class="form-control" style="width:800px; margin-left:150px; height:45px" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <select name="UserId" required class="form-control" style="width:800px; margin-left:150px;">
                            <?php
                            
                            foreach($models as $user) { ?>
                                <option value="<?=$user->id?>"><?=$user->name?></option>
                            <?php }

                            ?>
                        </select>
                    </div>

                    <button type="submit" name="AddTask" class="btn btn-primary" style="width:400px; margin-left:150px">Submit</button>
                </form>

            </div>

        </div>


    </section>

</div>