import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminSesionRoutingModule } from './admin-sesion-routing.module';
import { AdminSesionComponent } from './admin-sesion.component';

@NgModule({
  declarations: [
    AdminSesionComponent
  ],
  imports: [
    CommonModule,
    AdminSesionRoutingModule
  ]
})
export class AdminSesionModule { }
