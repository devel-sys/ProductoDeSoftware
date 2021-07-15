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
        routerLink: '/usuario/mis-proyectos',
        permiso: [1, 2, 3]
      },
      {
        label: 'Mis Actividades',
        icon: 'fas fa-luggage-cart',
        routerLink: '/usuario/mis-actividades',
        permiso: [2, 3]
      },
      {
        label: 'Historial de Actividades',
        icon: 'fas fa-exchange-alt',
        routerLink: '/usuario/historial-actividades',
        permiso: [2]
      },
      {
        label: 'Ranking de Proyectos',
        icon: 'fas fa-cart-arrow-down',
        routerLink: '/usuario/ranking-proyecto',
        permiso: [2]
      },
      {
        label: 'Ranking de Actividades',
        icon: 'fas fa-sort-amount-up',
        routerLink: '/usuario/ranking-actividades',
        permiso: [2]
      },
    ];
  }
}
