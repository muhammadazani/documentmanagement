<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <ul class="nav nav-list">


<li class="active"><a href="#"  onclick="_treeaksi('keuangan')"><i class="icon-home icon-white"></i> Document  </a></li> 
<ul id="keuangan">
<?php $categories=$this->Categories_model->getkategori(); ?>

<?php foreach($categories->result() as $kat){?>
<i class="icon-tags"></i>
<?php echo anchor('home1/perkategori/'.$kat->id, $kat->name);?><br/>
<?php } ?>
   
</ul> 


<li class="active"><a href="#" onclick="_treeaksi('user')"><i class=" icon-user icon-white"></i> User </a></li> 
<ul id="user">

	<a class="buat_user" href="<?php echo base_url('user2/register');?>"><i class=" icon-pencil"></i> Add User</a> <br />
    <a class="data_user" href="<?php echo base_url('user2/view');?>"><i class="icon-share"></i> View User </a>
</ul> 

<li class="active"><a href="#" onclick="_treeaksi('user')"><i class=" icon-user icon-white"></i> Category </a></li> 
<ul id="user">

	<a class="buat_user" href="<?php echo base_url('categories/add');?>"><i class=" icon-pencil"></i> Add Category</a> <br />
    <a class="data_user" href="<?php echo base_url('categories');?>"><i class="icon-share"></i> View Category </a>
</ul> 
 
 
 
 
 
 <li class="active"><a href="#"> Keluar / Log Out </a></li>
 

</ul>
    </div><div class="span10">