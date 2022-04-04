<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo base_url() ?>/vendor/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>/vendor/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>/vendor/public/assets/css/phoenix.min.css" rel="stylesheet" id="style-default">
    <link href="<?php echo base_url() ?>/vendor/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <!--
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
                  <p class="navbar-vertical-label">Modules</p><a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
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
                  <p class="navbar-vertical-label">Documentation</p><a class="nav-link" href="documentation/getting-started.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="life-buoy"></span></span><span class="nav-link-text">Getting started</span></div>
                  </a><a class="nav-link dropdown-indicator" href="#customization" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customization">
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
    -->
        <nav class="navbar navbar-light navbar-top navbar-expand">
          <div class="navbar-logo"><button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button> <a class="navbar-brand me-1 me-sm-3" href="index.html">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/icons/logo.jpg" alt="phoenix" width="164">
                  <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                </div>
              </div>
            </a></div>
          <div class="collapse navbar-collapse">
            <div class="search-box d-none d-lg-block">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search min-h-auto" type="search" placeholder="Search..." aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
            </div>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
              <li class="nav-item"><a class="nav-link active" aria-current="page" id="navbarDropdownNotification" href="<?php echo base_url() ?>index.php/home/login" >INGRESAR</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" id="navbarRegister" href="<?php echo base_url() ?>index.php/home/register" >REGISTRAR</a></li>
            
              <li class="nav-item dropdown"><a class="nav-link lh-1 px-0 ms-5" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/57.png" alt=""></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                  <div class="card bg-white position-relative border-0">
                    <div class="card-body p-0 overflow-auto scrollbar" style="height: 18rem;">
                      <div class="text-center pt-4 pb-3">
                        <div class="avatar avatar-xl"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/57.png" alt=""></div>
                        <h6 class="mt-2">Jerry Seinfield</h6>
                      </div>
                      <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Update your status"></div>
                      <ul class="nav d-flex flex-column mb-2 pb-1">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="user"></span>Profile</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                      </ul>
                    </div>
                    <div class="card-footer p-0 border-top">
                      <ul class="nav d-flex flex-column my-3">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                      </ul>
                      <hr>
                      <div class="px-3"><a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"><span class="me-2" data-feather="log-out"></span>Sign out</a></div>
                      <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        
        <div class="content pt-5">
          <div class="pb-5">
            <div class="row g-5">
              <div class="col-12 col-xxl-6">
                <div class="mb-8">
                  <h2 class="mb-2">Ecommerce Dashboard</h2>
                  <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5>
                </div>
                <div class="row align-items-center g-4">
                  <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/icons/illustrations/4.png" alt="" height="46" width="46">
                      <div class="ms-3">
                        <h4 class="mb-0">57 new orders</h4>
                        <p class="text-800 fs--1 mb-0">Awating processing</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/icons/illustrations/2.png" alt="" height="46" width="46">
                      <div class="ms-3">
                        <h4 class="mb-0">5 orders</h4>
                        <p class="text-800 fs--1 mb-0">On hold</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-auto">
                    <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/icons/illustrations/3.png" alt="" height="46" width="46">
                      <div class="ms-3">
                        <h4 class="mb-0">15 products</h4>
                        <p class="text-800 fs--1 mb-0">Out of stock</p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="bg-200 mb-6 mt-4">
                <div class="row flex-between-center mb-4 g-3">
                  <div class="col-auto">
                    <h3>Total sells</h3>
                    <p class="text-700 lh-sm mb-0">Payment received across all channels</p>
                  </div>
                  <div class="col-8 col-sm-4"><select class="form-select form-select-sm mt-2" id="select-gross-revenue-month">
                      <option>Mar 1 - 31, 2022</option>
                      <option>April 1 - 30, 2022</option>
                      <option>May 1 - 31, 2022</option>
                    </select></div>
                </div>
                <div class="echart-total-sales-chart" style="min-height:320px;width:100%"></div>
              </div>
              <div class="col-12 col-xxl-6">
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <div class="card border border-200 shadow-none h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h5 class="mb-1">Total orders<span class="badge badge-light-warning rounded-pill fs--1 ms-2">-6.8%</span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                          </div>
                          <h4>16,247</h4>
                        </div>
                        <div class="d-flex justify-content-center px-4 py-6">
                          <div class="echart-total-orders" style="height:85px;width:115px" data-echarts='{"tooltip":{"show":false},"series":[{"type":"bar","barWidth":"5px","data":[120,200,150,80,70,110,120],"showBackground":true,"symbol":"none","itemStyle":{"borderRadius":10},"backgroundStyle":{"borderRadius":10}}],"grid":{"right":10,"left":10,"bottom":0,"top":0}}'></div>
                        </div>
                        <div class="mt-2">
                          <div class="d-flex align-items-center mb-2">
                            <div class="bullet-item bg-primary me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Completed</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">52%</h6>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="bullet-item bg-light-primary me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Pending payment</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">48%</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="card border border-200 shadow-none h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h5 class="mb-1">New customers<span class="badge badge-light-warning rounded-pill fs--1 ms-2">+26.5%</span></h5>
                            <h6 class="text-700">Last 7 days</h6>
                          </div>
                          <h4>356</h4>
                        </div>
                        <div class="pb-0 pt-4">
                          <div class="echarts-new-customers" style="height:180px;width:100%;"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="card border border-200 shadow-none h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h5 class="mb-2">Top coupons</h5>
                            <h6 class="text-700">Last 7 days</h6>
                          </div>
                        </div>
                        <div class="pb-4 pt-3">
                          <div class="echart-top-coupons" style="height:115px;width:100%;"></div>
                        </div>
                        <div>
                          <div class="d-flex align-items-center mb-2">
                            <div class="bullet-item bg-primary me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Percentage discount</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">72%</h6>
                          </div>
                          <div class="d-flex align-items-center mb-2">
                            <div class="bullet-item bg-primary-200 me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Fixed card discount</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">18%</h6>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="bullet-item bg-info me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Fixed product discount</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">10%</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="card border border-200 shadow-none h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h5 class="mb-2">Paying vs non paying</h5>
                            <h6 class="text-700">Last 7 days</h6>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center pt-3">
                          <div style="height:145px;width:140px"><canvas id="payingCustomerChart"></canvas></div>
                        </div>
                        <div class="mt-3">
                          <div class="d-flex align-items-center mb-2">
                            <div class="bullet-item bg-primary me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Paying customer</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">30%</h6>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="bullet-item bg-light-primary me-2"></div>
                            <h6 class="text-900 fw-semi-bold flex-1 mb-0">Non-paying customer</h6>
                            <h6 class="text-900 fw-semi-bold mb-0">70%</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mx-n6 bg-white px-6 pt-7 border-y border-300">
            <div class="row">
              <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
                <div class="row align-items-end justify-content-between pb-5 g-3">
                  <div class="col-auto">
                    <h3>Latest reviews</h3>
                    <p class="text-700 lh-sm mb-0">Payment received across all channels</p>
                  </div>
                  <div class="col-12 col-md-auto">
                    <div class="row g-2">
                      <div class="col-auto flex-1">
                        <div class="search-box">
                          <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search" type="search" placeholder="Search" aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
                        </div>
                      </div>
                      <div class="col-auto"><button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100" type="button">All products</button><button class="btn btn-sm btn-phoenix-secondary ms-2 bg-white hover-bg-100" type="button"><span class="fas fa-ellipsis-h fs--2"></span></button></div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive mx-n1 px-1 scrollbar">
                  <table class="table fs--2 mb-0 overflow-hidden">
                    <thead>
                      <tr>
                        <th class="white-space-nowrap fs--1 border-top ps-0 align-middle">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </th>
                        <th class="sort border-top white-space-nowrap align-middle" scope="col"></th>
                        <th class="sort border-top white-space-nowrap align-middle" scope="col" style="min-width:360px;" data-sort="product">PRODUCT</th>
                        <th class="sort border-top align-middle" scope="col" data-sort="customer" style="min-width:200px;">CUSTOMER</th>
                        <th class="sort border-top align-middle" scope="col" data-sort="rating" style="min-width:110px;">RATING</th>
                        <th class="sort border-top align-middle" scope="col" style="max-width:350px;" data-sort="review">REVIEW</th>
                        <th class="sort border-top text-start ps-5 align-middle" scope="col" data-sort="status">STATUS</th>
                        <th class="sort border-top text-end align-middle" scope="col" data-sort="time">TIME</th>
                        <th class="sort border-top text-end pe-0 align-middle" scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img/products/1.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Fitbit Sense Advanced Smartwatch with Tools</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l">
                              <div class="avatar-name rounded-circle"><span>R</span></div>
                            </div>
                            <h6 class="mb-0 ms-3 text-900">Richard Dawkins</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">Very helpful to get going with rapid prototype development. Great support via email when I asked question.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Just now</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/2.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">iPhone 13 pro max-Pacific Blue-128GB storage</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/59.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Ashley Garrett</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">This template has allowed me to convert my existing web app into a great looking, easy to use UI in less than 2 weeks</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Just now</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/3.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Apple MacBook Pro 13 inch-M1-8/256GB-space</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/58.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Woodrow Burton</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">I have started using this theme in the last week and it has really impressed me very much, the support is second to n...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Just now</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/4.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Apple iMac 24&quot; 4K Retina Display M1 8 Core CPU...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/avatar-placeholder.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Eric McGee</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">The best experience we could hope for. Customer service team is amazing and the quality of their products is unsurpas...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 09, 3:23 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img/products/5.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Razer kraken V3 X wired 7.1 surround sound ga....</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/avatar-placeholder.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Kim Carroll</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">Team is very responsive to inquiries. Love this theme!</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 09, 2:15 PM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/6.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">PlayStation 5 DualSense Wireless Controller</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/57.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Barbara Lucas</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">The response time and service I received when contacted the designers were Phenomenal!</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 08, 8:53 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/7.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">2021 Apple 12.9-inch iPad Pro (Wi‑Fi, 128GB) -...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/3.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Ansolo Lazinatov</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">The response time and service I received when contacted the designers were Phenomenal!</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 07, 9:00 PM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/8.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Amazon Basics Matte Black Wired Keyboard - US ...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/26.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Emma watson</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">I have started using this theme in the last week and it has really impressed me very much, the support is second to n...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 07, 11:20 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/9.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Amazon Basics Mesh, Mid-Back, Swivel Office De...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/29.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Rowen Atkinson</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">The best experience we could hope for. Customer service team is amazing and the quality of their products is unsurpas...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 07, 2:00 PM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/10.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Apple Magic Mouse (Wireless, Rechargable) - Si...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l">
                              <div class="avatar-name rounded-circle"><span>A</span></div>
                            </div>
                            <h6 class="mb-0 ms-3 text-900">Anthony Hopkins</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">This template has allowed me to convert my existing web app into a great looking, easy to use UI in less than 2 weeks...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 06, 8:00 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/11.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Echo Dot (4th Gen) _ Smart speaker with Alexa ...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/8.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Jennifer Schramm</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">The theme is really beautiful and the support answer very quickly and is friendly. Buy it, you will not regret it.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 05, 4:00 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/12.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">HORI Racing Wheel Apex for PlayStation 4_3, an...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/avatar-placeholder.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Raymond Mims</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">As others mentioned, the team behind this theme is super responsive. I sent a message during the weekend, fully expec...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 04, 6:53 PM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/13.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Nintendo Switch with Neon Blue and Neon Red Jo...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/9.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Michael Jenkins</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">I had a bit of a hard time at first but after I contacted the team they were able to help me set up the theme. It's r...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 04, 12:00 PM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/14.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Oculus Rift S PC-Powered VR Gaming Headset</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/avatar-placeholder.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Kristine Cadena</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">Excellent. All my doubts were answered by the team quickly. I highly recommend it.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-warning">Pending<span class="ms-2 fas fa-stopwatch"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 03, 8:53 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0" style="width: 28px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><img src="<?php echo base_url() ?>/vendor/public/assets/img//products/15.png" alt="" width="53"></td>
                        <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                          <h6 class="fw-semi-bold mb-0">Sony X85J 75 Inch Sony 4K Ultra HD LED Smart G...</h6>
                        </td>
                        <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-l"><img class="rounded-circle" src="<?php echo base_url() ?>/vendor/public/assets/img/team/24.png" alt=""></div>
                            <h6 class="mb-0 ms-3 text-900">Suzanne Martinez</h6>
                          </div>
                        </td>
                        <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt text-warning star-icon"></span><span class="fa fa-star text-300"></span></td>
                        <td class="align-middle review" style="min-width:350px;width:500px;">
                          <p class="fs--1 fw-semi-bold text-1000 mb-0">This theme is great. Clean and easy to understand. Perfect for those who don't have time to start everything from scr...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                          <div class="hover-hide">
                            <h6 class="text-1000 mb-0">Nov 03, 10:43 AM</h6>
                          </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <div class="position-relative">
                            <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                          </div>
                          <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row align-items-center py-2">
                  <div class="pagination d-none"></div>
                  <div class="col d-flex fs--1">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less</a>
                  </div>
                  <div class="col-auto d-flex"><button class="btn btn-link px-1 me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left me-2"></span>Previous</button><button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gx-6">
            <div class="col-12 col-xl-6">
              <div class="mb-5 mt-7">
                <h3>Top regions by revenue</h3>
                <p class="text-700">Where you generated most of the revenue</p>
              </div>
              <div class="table-responsive scrollbar">
                <table class="table fs--2 mb-0">
                  <thead>
                    <tr>
                      <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%">COUNTRY</th>
                      <th class="border-top border-200 align-middle" scope="col" style="width:17%">USERS</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:16%">TRANSACTIONS</th>
                      <th class="border-top border-200 text-end align-middle" scope="col" style="width:20%">REVENUE</th>
                      <th class="border-top border-200 text-end pe-0 align-middle" scope="col" style="width:17%">CONV. RATE</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                      <td></td>
                      <td class="align-middle py-4">
                        <h4 class="mb-0 fw-normal">377,620</h4>
                      </td>
                      <td class="align-middle text-end py-4">
                        <h4 class="mb-0 fw-normal">236</h4>
                      </td>
                      <td class="align-middle text-end py-4">
                        <h4 class="mb-0 fw-normal">$15,758</h4>
                      </td>
                      <td class="align-middle text-end py-4 pe-0">
                        <h4 class="mb-0 fw-normal">10.32%</h4>
                      </td>
                    </tr>
                    <tr>
                      <td class="white-space-nowrap ps-0" style="width:32%">
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 me-3">1.</h6><a href="#!">
                            <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/country/india.png" alt="" width="24">
                              <p class="mb-0 ps-3 text-primary fw-bold fs--1">India</p>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="align-middle" style="width:17%">
                        <h6 class="mb-0">92896<span class="text-700 fw-medium ms-2">(41.6%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">67<span class="text-700 fw-medium ms-2">(34.3%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">$7560<span class="text-700 fw-medium ms-2">(36.9%)</span></h6>
                      </td>
                      <td class="align-middle text-end pe-0" style="width:17%">
                        <h6>14.01%</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="white-space-nowrap ps-0" style="width:32%">
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 me-3">2.</h6><a href="#!">
                            <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/country/china.png" alt="" width="24">
                              <p class="mb-0 ps-3 text-primary fw-bold fs--1">China</p>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="align-middle" style="width:17%">
                        <h6 class="mb-0">50496<span class="text-700 fw-medium ms-2">(32.8%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">54<span class="text-700 fw-medium ms-2">(23.8%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">$6532<span class="text-700 fw-medium ms-2">(26.5%)</span></h6>
                      </td>
                      <td class="align-middle text-end pe-0" style="width:17%">
                        <h6>23.56%</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="white-space-nowrap ps-0" style="width:32%">
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 me-3">3.</h6><a href="#!">
                            <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/country/usa.png" alt="" width="24">
                              <p class="mb-0 ps-3 text-primary fw-bold fs--1">USA</p>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="align-middle" style="width:17%">
                        <h6 class="mb-0">45679<span class="text-700 fw-medium ms-2">(24.3%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">35<span class="text-700 fw-medium ms-2">(19.7%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">$5432<span class="text-700 fw-medium ms-2">(16.9%)</span></h6>
                      </td>
                      <td class="align-middle text-end pe-0" style="width:17%">
                        <h6>10.23%</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="white-space-nowrap ps-0" style="width:32%">
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 me-3">4.</h6><a href="#!">
                            <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/country/south-korea.png" alt="" width="24">
                              <p class="mb-0 ps-3 text-primary fw-bold fs--1">South Korea</p>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="align-middle" style="width:17%">
                        <h6 class="mb-0">36453<span class="text-700 fw-medium ms-2">(19.7%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">22<span class="text-700 fw-medium ms-2">(9.54%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">$4673<span class="text-700 fw-medium ms-2">(11.6%)</span></h6>
                      </td>
                      <td class="align-middle text-end pe-0" style="width:17%">
                        <h6>8.85%</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="white-space-nowrap ps-0" style="width:32%">
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 me-3">5.</h6><a href="#!">
                            <div class="d-flex align-items-center"><img src="<?php echo base_url() ?>/vendor/public/assets/img/country/vietnam.png" alt="" width="24">
                              <p class="mb-0 ps-3 text-primary fw-bold fs--1">Vietnam</p>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="align-middle" style="width:17%">
                        <h6 class="mb-0">15007<span class="text-700 fw-medium ms-2">(11.9%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">17<span class="text-700 fw-medium ms-2">(6.91%)</span></h6>
                      </td>
                      <td class="align-middle text-end" style="width:17%">
                        <h6 class="mb-0">$2456<span class="text-700 fw-medium ms-2">(10.2%)</span></h6>
                      </td>
                      <td class="align-middle text-end pe-0" style="width:17%">
                        <h6>6.01%</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="d-flex align-items-center justify-content-between py-2 fs--1 mb-1">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="">1 to 5 <span class="text-600">Items of </span>15</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-2" data-fa-transform="down-1"></span></a>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="mx-n6 ms-xl-0 h-100">
                <div class="h-100 w-100">
                  <div class="h-100 bg-white" id="map" style="min-height: 300px;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="mx-n6 bg-white px-6 pt-7 pb-6 border-top border-300">
            <div class="row g-5">
              <div class="col-12 col-xl-6">
                <div class="me-xl-4">
                  <div>
                    <h3>Projection vs authentic</h3>
                    <p class="text-700">Actual earnings vs projected earnings</p>
                  </div>
                  <div class="echart-project-actual" style="height:300px; width:100%"></div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div>
                  <h3>Returning customer rate</h3>
                  <p class="text-700">Rate of customers returning to your shop over time</p>
                </div>
                <div class="echart-returning-customer" style="height:300px;"></div>
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-900">Thank you for creating with phoenix <span class="d-none d-sm-inline-block">|</span><br class="d-sm-none">2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.0.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>
    <script src="<?php echo base_url() ?>/vendor/public/assets/js/phoenix.js"></script>
    <script src="<?php echo base_url() ?>/vendor/public/assets/js/ecommerce-dashboard.js"></script>
  </body>

</html>