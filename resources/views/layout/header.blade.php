<div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="{{asset('admin/assets/img/logo.png')}}" width="35" height="35" alt=""> <span>Preclinic</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
               
                <li class="nav-item dropdown has-arrow">
                    <a href="{{ route('profile') }}" class=" nav-link user-link" >
                        <span class="user-img">
							<img class="rounded-circle" src="{{asset('admin/assets/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin</span>
                    </a>
					
                </li>
            </ul>
          
        </div>