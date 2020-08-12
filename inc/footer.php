    <section id="footer" class="text-center p-3 text-light">
    	<div class="container">
    		<div class="row">
    			<div class="col">
    				<p class="lead mb-0">&copy;Copyright CSEJnU <?php echo date("Y"); ?></p>
    			</div>
    		</div>
    	</div>
    	<section id="icon">
    		<div class="row mt-2">
    			<?php
            $sql = "select * from tbl_social";
            $result = $db->select($sql);
            if($result)
            {
                foreach($result as $data)
                {
        ?>

    			<div class="col">
    				<a href="<?php echo $data['fb'];?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
					<a href="<?php echo $data['insta'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    				<a href="<?php echo $data['whatsapp'];?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
    				<a href="<?php echo $data['google'];?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    			</div>
    			<?php } }?>
    		</div>
    	</section>
    </section>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="js/wow.min.js"></script>
    </body>

    </html>
