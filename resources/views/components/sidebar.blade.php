<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ asset('/admin/index.html') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('/admin/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Cardio Rescue</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('branches.index') }}" class="nav-link ">
                        <i class="bi bi-building-add"></i>
                        <p>
                            Create Branch
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ asset('/admin/generate/theme.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Theme Generate</p>
                    </a>
                </li> --}}
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    Patient's
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('register.index') }}" class="nav-link">
                                        <i class="fas fa-user-friends text-warning"></i>
                                        <p>List of Patient's</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('register.create') }}" class="nav-link">
                                        <i class="fa-regular fa-address-card text-warning "></i>
                                        <p>Patient's Registration</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-journal-check"></i>
                                <p>
                                    Assessment
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('assessment.index') }}" class="nav-link">
                                        <i class="bi bi-check2-square text-warning"></i>
                                        <p>Assign Assessment</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('assessment.create') }}" class="nav-link ">
                                        <i class="bi bi-clipboard-check text-warning"></i>
                                        <p>Fill Assesment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-md"></i>
                                <p>
                                    Doctor's
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('doctor.index')}}" class="nav-link">
                                        <i class="bi bi-card-list text-warning"></i>
                                        <p>Doctor List</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('doctor.create')}}" class="nav-link">
                                        <i class="bi bi-person-plus-fill text-warning"></i>
                                        <p>Create Doctor</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Widgets
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/widgets/small-box.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Small Box</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/widgets/info-box.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>info Box</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/widgets/cards.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Cards</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Layout Options
                            <span class="nav-badge badge text-bg-secondary me-3">6</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/unfixed-sidebar.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Default Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/fixed-sidebar.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/layout-custom-area.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Layout <small>+ Custom Area </small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/sidebar-mini.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sidebar Mini</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/collapsed-sidebar.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sidebar Mini <small>+ Collapsed</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/logo-switch.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Sidebar Mini <small>+ Logo Switch</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/layout/layout-rtl.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Layout RTL</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tree-fill"></i>
                        <p>
                            UI Elements
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/UI/general.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/UI/icons.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/UI/timeline.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Forms
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/forms/general.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Tables
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/tables/simple.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-in-right"></i>
                        <p>
                            Auth
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p>
                                    Version 1
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('/admin/examples/login.html') }}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Login</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ asset('/admin/examples/register.html') }}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Register</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p>
                                    Version 2
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('/admin/examples/login-v2.html') }}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Login</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ asset('/admin/examples/register-v2.html') }}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Register</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/examples/lockscreen.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">DOCUMENTATIONS</li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/introduction.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-download"></i>
                        <p>Installation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/layout.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-grip-horizontal"></i>
                        <p>Layout</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/color-mode.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-star-half"></i>
                        <p>Color Mode</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-ui-checks-grid"></i>
                        <p>
                            Components
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/docs/components/main-header.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Main Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('/admin/docs/components/main-sidebar.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Main Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-filetype-js"></i>
                        <p>
                            Javascript
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/admin/docs/javascript/treeview.html') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Treeview</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/browser-support.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-browser-edge"></i>
                        <p>Browser Support</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/how-to-contribute.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                        <p>How To Contribute</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/faq.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-question-circle-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('/admin/docs/license.html') }}" class="nav-link">
                        <i class="nav-icon bi bi-patch-check-fill"></i>
                        <p>License</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>
                            Level 1
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>
                                    Level 2
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
