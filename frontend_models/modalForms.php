<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form class="modal-content animate" action="index.php" method="post">
            <div class="modal-header text-center">
               <h4 class="modal-title w-100 font-weight-bold">Log Into Account</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body mx-3">
               <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
               </div>
               <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button class="btn btn-default" type="submit">Log In</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
	     <form class="modal-content animate" action="index.php" method="post">
			 <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Register Account</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			 </div>
			 <div class="modal-body mx-3">
				<div class="md-form mb-5">
				   <i class="fas fa-envelope prefix grey-text"></i>
				   <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
				</div>
				<div class="md-form mb-4">
				   <i class="fas fa-lock prefix grey-text"></i>
				   <input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="md-form mb-4">
				   <i class="fas fa-lock prefix grey-text"></i>
				   <input type="password" class="form-control" name="vpassword" placeholder="Verify Password" required>
				</div>
			 </div>
			 <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Register</button>
			 </div>
         </form>
      </div>
   </div>
</div>