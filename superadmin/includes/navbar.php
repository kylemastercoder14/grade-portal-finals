<?php
// Get the current page file name
$current_page = basename($_SERVER['PHP_SELF']);

// Define an array of menu items with their corresponding URLs, icons, and submenus
$menu_items = array(
    'index.php' => array('Dashboard', 'ti-smart-home', array()),
    'year-level.php' => array('General', 'ti-layout-grid-add', array(
        'year-level.php' => 'Year Level',
        'programs.php' => 'Programs',
        'sections.php' => 'Sections',
        'subjects.php' => 'Subjects',
        'class-list.php' => 'Class List'
    )),
    'students.php' => array('Students', 'ti-users', array()),
    'faculties.php' => array('Faculties', 'ti-id', array()),
    'registrar.php' => array('Registrar', 'ti-user-circle', array()),
    'announcement.php' => array('Others', 'ti-toggle-left', array(
        'document-request.php' => 'Document Request',
        'announcement.php' => 'Announcement',
        'feedbacks.php' => 'Feedbacks',
        'settings.php' => 'Settings'
    )),
    'backup-database.php' => array('Back-up & Restore', 'ti-database', array())
);
?>

<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <?php foreach ($menu_items as $url => $data) : ?>
                <li class="menu-item <?php echo ($current_page == $url || (isset($data[2]) && array_key_exists($current_page, $data[2]))) ? 'active' : ''; ?>">
                    <a href="<?php echo $url; ?>" class="menu-link <?php echo isset($data[2]) && !empty($data[2]) ? 'menu-toggle' : ''; ?>">
                        <i class="menu-icon tf-icons ti <?php echo $data[1]; ?>"></i>
                        <div><?php echo $data[0]; ?></div>
                    </a>
                    <?php if (isset($data[2]) && !empty($data[2])) : ?>
                        <ul class="menu-sub">
                            <?php foreach ($data[2] as $sub_url => $sub_label) : ?>
                                <li class="menu-item <?php echo ($current_page == $sub_url) ? 'active' : ''; ?>">
                                    <a href="<?php echo $sub_url; ?>" class="menu-link">
                                        <div><?php echo $sub_label; ?></div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>