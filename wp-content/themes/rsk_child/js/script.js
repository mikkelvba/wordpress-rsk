jQuery( window ).load( function() {
  jQuery( '.sf-menu .menu-item-has-children' ).GenerateDropdownMenu.destroy();
  jQuery( '.sf-menu .menu-item-has-children' ).GenerateDropdownMenu({
    transition_speed: 0,
    open_delay: 0,
    close_delay: 0
  });
});
