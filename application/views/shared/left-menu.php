<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item"><a class="nav-link active" href="index.html">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="cast"></span></span><span class="nav-link-text">Dashbboard</span></div>
                  </a></li>
                <li class="nav-item">
                  <p class="navbar-vertical-label">Pages</p><a class="nav-link" href="pages/starter.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="flag"></span></span><span class="nav-link-text">Starter</span></div>
                  </a><a class="nav-link dropdown-indicator" href="#errors" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="errors">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="alert-triangle"></span></span><span class="nav-link-text">Errors</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="errors">
                    <li class="nav-item"><a class="nav-link" href="pages/errors/404.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">404</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/errors/500.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">500</span></div>
                      </a></li>
                  </ul><a class="nav-link dropdown-indicator" href="#authentication" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="lock"></span></span><span class="nav-link-text">Authentication</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="authentication">
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/sign-in.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Sign in</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/sign-up.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Sign up</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/sign-out.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Sign out</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Forgot password</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/reset-password.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Reset password</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/authentication/simple/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Lock screen</span></div>
                      </a></li>
                  </ul>
                </li>


                <li class="nav-item">
                  <p class="navbar-vertical-label">Users</p>
                  
                  <a class="nav-link" href="documentation/getting-started.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="life-buoy"></span></span><span class="nav-link-text">Users</span></div>
                  </a>

                  <a class="nav-link" href="<?php echo base_url() ?>index.php/department" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span data-feather="life-buoy"></span></span>
                        <span class="nav-link-text">Departments</span>
                    </div>
                  </a>

                  <a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="file-text"></span></span><span class="nav-link-text">Forms</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="forms">
                    <li class="nav-item"><a class="nav-link" href="modules/forms/form-control.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Form control</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/input-group.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Input group</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/select.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Select</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/checks.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Checks</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/range.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Range</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/layout.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Layout</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Floating labels</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/forms/validation.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Validation</span></div>
                      </a></li>
                  </ul><a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">Tables</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="tables">
                    <li class="nav-item"><a class="nav-link" href="modules/tables/basic-tables.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Basic tables</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/tables/advance-tables.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Advance tables</span></div>
                      </a></li>
                  </ul><a class="nav-link dropdown-indicator" href="#components" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Components</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="components">
                    <li class="nav-item"><a class="nav-link" href="modules/components/accordion.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Accordion</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/avatar.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Avatar</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/alerts.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Alerts</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/badge.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Badge</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/breadcrumb.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Breadcrumb</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/button.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Buttons</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/card.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Card</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/carousel.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Carousel</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/collapse.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Collapse</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/dropdown.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Dropdown</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/list-group.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">List group</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/modal.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Modals</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/offcanvas.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Offcanvas</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/progress-bar.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Progress bar</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/placeholder.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Placeholder</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/pagination.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Pagination</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/popovers.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Popovers</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/scrollspy.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Scrollspy</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/spinners.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Spinners</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/toast.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Toast</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/components/tooltips.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Tooltips</span></div>
                      </a></li>
                  </ul><a class="nav-link dropdown-indicator" href="#utilities" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="utilities">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="tool"></span></span><span class="nav-link-text">Utilities</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="utilities">
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/background.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Background</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/borders.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Borders</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/colors.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Colors</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/display.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Display</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/flex.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Flex</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/float.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Float</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/interactions.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Interactions</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/opacity.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Opacity</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/overflow.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Overflow</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/position.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Position</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/shadows.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Shadows</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/sizing.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Sizing</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/spacing.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Spacing</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/typography.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Typography</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/vertical-align.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Vertical align</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="modules/utilities/visibility.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Visibility</span></div>
                      </a></li>
                  </ul><a class="nav-link dropdown-indicator" href="#multi-level" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="layers"></span></span><span class="nav-link-text">Multi level</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="multi-level">
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#level-two" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                        <div class="d-flex align-items-center">
                          <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Level two</span>
                        </div>
                      </a>
                      <ul class="nav collapse parent" id="level-two">
                        <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 1</span></div>
                          </a></li>
                        <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 2</span></div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#level-three" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                        <div class="d-flex align-items-center">
                          <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Level three</span>
                        </div>
                      </a>
                      <ul class="nav collapse parent" id="level-three">
                        <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 3</span></div>
                          </a></li>
                        <li class="nav-item"><a class="nav-link dropdown-indicator" href="#item-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="level-three">
                            <div class="d-flex align-items-center">
                              <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Item 4</span>
                            </div>
                          </a>
                          <ul class="nav collapse parent" id="item-4">
                            <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 5</span></div>
                              </a></li>
                            <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 6</span></div>
                              </a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#level-four" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                        <div class="d-flex align-items-center">
                          <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Level four</span>
                        </div>
                      </a>
                      <ul class="nav collapse parent" id="level-four">
                        <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 6</span></div>
                          </a></li>
                        <li class="nav-item"><a class="nav-link dropdown-indicator" href="#item-7" data-bs-toggle="collapse" aria-expanded="false" aria-controls="level-four">
                            <div class="d-flex align-items-center">
                              <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Item 7</span>
                            </div>
                          </a>
                          <ul class="nav collapse parent" id="item-7">
                            <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 8</span></div>
                              </a></li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator" href="#item-9" data-bs-toggle="collapse" aria-expanded="false" aria-controls="item-7">
                                <div class="d-flex align-items-center">
                                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-text">Item 9</span>
                                </div>
                              </a>
                              <ul class="nav collapse parent" id="item-9">
                                <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Item 10</span></div>
                                  </a></li>
                                <li class="nav-item"><a class="nav-link" href="#!.html" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Item 11</span></div>
                                  </a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <p class="navbar-vertical-label">Documentation</p>
                  <a class="nav-link" href="documentation/getting-started.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="life-buoy"></span></span><span class="nav-link-text">Getting started</span></div>
                  </a>
                  <a class="nav-link dropdown-indicator" href="#customization" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customization">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="settings"></span></span><span class="nav-link-text">Customization</span>
                    </div>
                  </a>
                  <ul class="nav collapse parent" id="customization">
                    <li class="nav-item"><a class="nav-link" href="documentation/customization/styling.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Styling</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link" href="documentation/customization/plugin.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text">Plugin</span></div>
                      </a></li>
                  </ul><a class="nav-link" href="documentation/webpack.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="hexagon"></span></span><span class="nav-link-text">Webpack</span></div>
                  </a><a class="nav-link" href="documentation/design-file.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="figma"></span></span><span class="nav-link-text">Design file</span></div>
                  </a><a class="nav-link" href="changelog.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text">Changelog</span></div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="navbar-vertical-footer"><a class="btn btn-link border-0 fw-semi-bold d-flex ps-0" href="#!"><span class="navbar-vertical-footer-icon" data-feather="log-out"></span><span>Settings</span></a></div>
          </div>
        </nav>