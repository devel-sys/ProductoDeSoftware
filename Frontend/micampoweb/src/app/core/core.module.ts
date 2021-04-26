import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavbarComponent } from '../navbar/navbar.component';
import { RouterModule } from '@angular/router';
import { PrincipalComponent } from '../principal/principal.component';
import { NovedadesComponent } from '../novedades/novedades.component';

@NgModule({
  declarations: [
    NavbarComponent,
    PrincipalComponent,
    NovedadesComponent
  ],
  imports: [
    CommonModule,
    RouterModule //mportado para que funcione el enrutamiento en el navbar
  ],
  exports: [
    NavbarComponent,
    PrincipalComponent
  ]
})
export class CoreModule { }
