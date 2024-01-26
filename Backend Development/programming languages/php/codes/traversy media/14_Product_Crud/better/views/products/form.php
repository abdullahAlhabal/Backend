    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
          
            <?php if($product['image']):?>
                <img src="/<?php echo $product['image']?>" alt="image for <?php echo $product['title']?> " class="image-preview">
            <?php endif;?>

            <div class="form-group my-3">
                <label for="title">Product title</label>
                <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="<?php echo $title?>">
            </div>
          
            <div class="form-group my-3">
                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="5" class=form-control><?php echo $description ?></textarea>
            </div>
            
            <div class="form-group my-3">
                <label for="image">Product Image</label>
                <br>
                <input type="file"  id="image" name="image">
            </div>

            <div class="form-group my-3">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" step=".01" placeholder="price" name="price" value="<?php echo $price ?>" >
            </div>

          <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </form>