
<table class="table">

  <thead>
    <tr>
      <th width="100">Title</th>
      <th width="200">File Name</th>
      <th width="150">Date Modified</th>
      <th width="55">status</th>
      <th width="50">aksi</th>
      <th width="50">down</th>
      
    </tr>
  </thead>
<?php echo form_open('posts/add')?>
<?php if(is_array($posts)): ?>
<?php foreach($posts as $post):?>
<table class="table table-striped">
<tr>




<td width="100"><strong><?php echo anchor('posts/view_each/'.$post['id'],$post['title'])?></strong></td>
<td width="200"><?php echo $post ['image'];?></td>
<td width="150"><?php echo $post ['created'];?></td>
<td width="55"><?php  if($post ['status']==1){echo "Approved";} else if($post ['status']==2){echo "Rejected";}else{echo "Draft";}?></td>
<td width="50"><?php echo anchor('posts/edit/'.$post['id'],'<i class=" icon-pencil"></i>')."|".anchor('posts/delete/'.$post['id'],'<i class="  icon-trash"></i>',array
('onClick' => "return confirm('apakah anda yakin ')"));?></td>
<td width="50"><?php echo "<b><a href='".base_url()."./public/media/posts/".$post['image']."'>[ Down ]</a></b>"?></td>





<?php  endforeach;?>
<?php endif; ?>
<?php echo form_close();?>
</tr>
</table></table>