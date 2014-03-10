
	<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.equalHeight.js"></script>-->          
        <aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
			<!--<li class="icn_edit_article"><a href="#">Edit Articles</a></li>-->
			<li class="icn_categories"><a href="<?php echo base_url();?>kategori">Categories</a></li>
			<!--<li class="icn_tags"><a href="#">Tags</a></li>-->
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<!--<li class="icn_add_user"><a href="<?php echo base_url();?>users">Add New User</a></li>-->
			<li class="icn_view_users"><a href="<?php echo base_url();?>users">View Users</a></li>
                        <li class="icn_new_article"><a href="<?php echo base_url();?>vtarget">Venue Target</a></li>
			<!--<li class="icn_profile"><a href="<?php echo base_url();?>target">Venue Target</a></li>-->
		</ul>
<!--		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>-->
		<h3>Admin</h3>
		<ul class="toggle">
<!--			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>-->
			<li class="icn_jump_back"><a href="<?php echo base_url();?>login/logout">Logout</a></li>
		</ul>
		
		<!-- end of sidebar -->
	<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Lugar Admin</strong></p>
                        <p>Application By <a href="#">Lugar Inc.</a></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
	</footer>
        </aside>