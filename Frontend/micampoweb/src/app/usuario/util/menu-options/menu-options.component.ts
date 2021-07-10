import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-menu-options',
  templateUrl: './menu-options.component.html',
  styleUrls: ['./menu-options.component.scss']
})
export class MenuOptionsComponent implements OnInit {

  public menuItems = [];

  constructor() { }

  ngOnInit() {
    this.setMenu();
  }

  private setMenu() {
    this.menuItems = [
      {
        label: 'Mis Campos',
        icon: 'fas fa-cart-arrow-down',
        routerLink: '/usuario/mis-campos',
        permiso: [1, 2, 3]
      },
      {
        label: 'Mis Proyectos',
        icon: 'fas fa-history',
        routerLink: '/admin/historialVendedor',
        permiso: [1, 2, 3]
      },
      {
        label: 'Mis Actividades',
        icon: 'fas fa-luggage-cart',
        routerLink: '/admin/pedidosNoConfirmados',
        permiso: [2, 3]
      },
      {
        label: 'Historial de Actividades',
        icon: 'fas fa-exchange-alt',
        routerLink: '/admin/historial-cambios',
        routerLinkActiveOptions: '{exact : true}',
        permiso: [2]
      },
      {
        label: 'Ranking de Proyectos',
        icon: 'fas fa-cart-arrow-down',
        routerLink: '/admin/ventas',
        routerLinkActiveOptions: '{exact : true}',
        permiso: [2]
      },
      {
        label: 'Ranking de Actividades',
        icon: 'fas fa-sort-amount-up',
        routerLink: '/admin/productos',
        routerLinkActiveOptions: '{exact : true}',
        permiso: [2]
      },
      {
        label: 'Estadísticas',
        icon: 'fas fa-chart-bar',
        routerLink: '/admin/estadisticas',
        routerLinkActiveOptions: '{exact : true}',
        permiso: [2]
      },
    ];
  }
}
