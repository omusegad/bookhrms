	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li><a href="{{ route('dashboard') }}">
							<i class="la la-dashboard"></i> <span> Dashboard </span></a></li>
							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ url('/admin') }}">Users</a></li>
									<li>
										<a href="{{ url('/job-groups') }}">
										  Job Groups
										</a>
									</li>
									<li class="submenu">
										<a href="#">
											<span> Regions</span> <span class="menu-arrow"></span>
										</a>
										<ul style="display: none;">
											<li><a href="{{ url('/regions') }}">All Regions</a></li>
											<li><a href="{{ url('/dccs-regions') }}">DCCs</a></li>
											<li><a href="{{ url('/lccs-regions') }}">LCCs</a></li>
										</ul>
									</li>
								
									<li><a href="{{ url('/nhif-details') }}">NHIF Details</a></li>
									<li><a href="{{ url('/nssf-details') }}">NSSF Details</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Employees</span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
								    <li><a  href="{{ url('/employees') }}">All Employees</a></li>
								
									<li><a href="leaves-employee.html">Leaves (Employee)</a></li>
									<li><a href="leave-settings.html">Leave Settings</a></li>
									<li><a href="attendance.html">Attendance (Admin)</a></li>
							
								</ul>
							</li>
							<li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Leaves </span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
								    <li><a  href="{{ url('/leaves') }}">All Leaves</a></li>
									<li><a href="{{ url('/leave-types') }}">Leave Types</a></li>
									<li><a href="{{ url('/leave-settings') }}">Leave Setting</a></li>
									<li><a href="{{ url('/leaves') }}">Leave Application</a></li>
								</ul>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->