	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
						<li><a href="{{ url('/organogram') }}"><i class="la la-dashboard"></i> <span> Nandi Aic Structure </span></a></li>

							<li><a href="{{ route('dashboard') }}">
							<i class="la la-dashboard"></i> <span> Dashboard </span></a></li>
							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
                                    <li><a href="{{ url('/admin') }}">Admins</a></li>
									<li><a href="{{ route('roles.index') }}">Roles</a></li>

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
								</ul>
							</li>
							<li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Employees</span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
								    <li><a  href="{{ route('employees.index') }}">All Employees</a></li>
                                    <li><a href=" {{ route('employees.create') }}">Add Employees</a></li>
									<li><a href=" {{ route('employees.show',[auth()->user()->id]) }}">Profile</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Leaves </span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
								    <li><a  href="{{ route('leaves.index') }}">All Leaves</a></li>
									<li><a href="{{ route('leave-types.index') }}">Leave Types</a></li>
									<li><a href="{{ route('leave-settings.index') }}">Leave Setting</a></li>
                                    <li><a href="{{ route('leaves.create') }}">Leave Application</a></li>
                                    <li><a href="{{ route('holidays.index') }}">Holidays</a></li>

								</ul>
                            </li>
                            <li class="submenu">
								<a href="#">
								<i class="la la-dashboard"></i>
									 <span> Salaries</span> <span class="menu-arrow"></span>
								</a>
								<ul style="display: none;">
                                    <li><a href="{{ route('salaries.index') }}">Salaries</a></li>
                                    <li><a href="{{ route('salary-settings.index') }}">Salary Settings</a></li>
									<li><a href="{{ route('payroll.index') }}">Payroll</a></li>
								</ul>
							</li>

						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
