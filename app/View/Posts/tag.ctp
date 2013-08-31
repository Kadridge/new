
          <div class="row">
              <div class="page-header">
                  <h2><span class="glyphicon glyphicon-tags"></span> Posts related to the tag: <strong><?php echo $name; ?></strong></h2>
              </div>
              <?php foreach($posts as $v):?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                  <div class="caption">
                    <?php echo $v['Post']['title']; ?>
                      <?php
                      if (isset($v['Post']['thumb'])){
                          echo $this->Media->image($v['Post']['thumb'], 234, 200);
                      }else{
                           echo $this->Html->image('http://placehold.it/234x200');
                      }
                      ?>
                        <p class="infothumbnail"><?php echo $this->Media->image($v['User']['Thumb']['file'], 30, 30, array('class'=>'img-thumbnail')); ?>
                        <?php echo $v['User']['username']; ?>
                        </p>
                        <?php  echo $v['Post']['body']; ?>
                        <div class="btn-group btn-group-justified">
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-info', 'escape' => false)); ?>
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-heart"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-danger', 'escape' => false)); ?>
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-default', 'escape' => false)); ?>
                        </div>
                    </div>
                </div>
            </div><!--/span-->              
              <?php endforeach; ?>
          </div><!--/row-->
    </div><!--/.container-->
