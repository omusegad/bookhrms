	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="index.html">Admin Dashboard</a></li>
									<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#">
									<i class="la la-dashboard"></i>
									 <span> Regions</span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
							    	<li><a href="{{ url('/regions') }}">All Regions</a></li>
									<li><a href="{{ url('/dccs-regions') }}">DCCs</a></li>
									<li><a href="{{ url('/lccs-regions') }}">LCCs</a></li>
								</ul>
							</li>

							<li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Employees</span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
								    <li><a  href="{{ url('/employees') }}">All Employees</a></li>
									<li><a href="holidays.html">Holidays</a></li>
									<li><a href="leaves.html">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
									<li><a href="leaves-employee.html">Leaves (Employee)</a></li>
									<li><a href="leave-settings.html">Leave Settings</a></li>
									<li><a href="attendance.html">Attendance (Admin)</a></li>
									<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
									<li><a href="departments.html">Departments</a></li>
									<li><a href="designations.html">Designations</a></li>
									<li><a href="timesheet.html">Timesheet</a></li>
									<li><a href="overtime.html">Overtime</a></li>
								</ul>
							</li>
						
						
					
						
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->