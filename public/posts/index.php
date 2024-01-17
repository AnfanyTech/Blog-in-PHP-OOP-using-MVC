<main>
   <div class="album py-5 bg-body-tertiary">
    <div class="container-fluid">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($posts as $post): ?>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title></title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$post->title;?></text></svg>
            <div class="card-body">
              <?php foreach($categories->fetchNtoN($post->id) as $postCategories):?>
                <span class="badge rounded-pill bg-success">
                  <a href="http://localhost/Blog/public/?p=category&id=<?=$postCategories->id;?>" class="text-decoration-none link-light">
                  <?=$postCategories->title;?>
                  </a>
               </span>
              <?php endforeach; ?>
              <p class="card-text"><?=substr($post->content, 0, 200).'...';?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-secondary"><a class="text-decoration-none link-info" href="?p=read&id=<?=$post->id;?>"> Voir plus..</a></button>
                </div>
                <small class="text-body-secondary">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>