<div class="album py-5 bg-body-tertiary">
      <div class="container">
          <div class="col-md-12">
            <div class="card">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$post->title;?></text></svg>
              <div class="card-body">
              <?php foreach($categories as $postCategories):?>
                  <span class="badge rounded-pill bg-success">
                    <?=$postCategories->title;?>
                </span>
                <?php endforeach; ?>
                <p class="card-text"><?=$post->content;?></p>
              </div>
            
            <section class="pb-4">
    <div class="bg-white border-0">
      <section class="w-100 p-4">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12 col-lg-10 col-xl-8 bg-light my-4">

                <?php if(!empty($comments)):?>
                <p class="fw-light mb-4 pb-2">Derniers commentaires postés par les utilisateurs</p>
                <div class="d-flex flex-start align-items-center">
                  <?php foreach($comments as $comment): ?>
                  <div>
                    <h6 class="fw-bold text-primary mb-1"><?=$comment->user_name; ?></h6>
                    <p class="text-muted small mb-0">
                      Shared publicly - Jan 2020
                    </p>
                  </div>
                </div>
                <p class="mt-3 mb-4 pb-2">
                <?=$comment->message; ?>
                </p>
                <?php endforeach;?>
                <?php else:?>
                <p class="fw-light mb-4 pb-2">Aucun commentaire disponible</p>
                <?php endif;?>
                <div class="col-md-10">
            <?php 
            use App\Helpers\Session;
            $session = new Session;
            if ($session->verifySessionExist('admin') || $session->verifySessionExist('user')):?>
                  <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <h2>Ajouter un nouveau commentaire</h2>
                    <div class="d-flex flex-start w-100">
                      <div class="form-outline w-100">
                        <label class="form-label" for="textAreaExample">Message</label>
                        <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                      </div>
                    </div>
                    <div class="float-end mt-2 pt-1">
                      <button type="button" class="btn btn-primary btn-sm">Commentez</button>
                      <button type="button" class="btn btn-outline-primary btn-sm">Annuler</button>
                    </div>
                  </div>
              </div>
                <?php else: ?>
              </div>
              <div class="col-md-10">
              <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                <a href="http://localhost/Blog/public/?p=connection" class="text-decoration-none text-center"><h2>Merci de vous connecter pour poster vos commentaires</h2></a>
              </div>
              </div>
            <?php endif; ?>
              
        </div>
      </section>
    </div>
  </div>
  </div>
  </div>
