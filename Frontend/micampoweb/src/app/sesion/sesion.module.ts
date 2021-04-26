import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UsuarioSesionComponent } from './usuario-sesion/usuario-sesion.component';
import { AdminSesionComponent } from './admin-sesion/admin-sesion.component';
import { RouterModule } from '@angular/router';

@NgModule({
  declarations: [
    UsuarioSesionComponent, 
    AdminSesionComponent
  ],
  imports: [
    CommonModule,
  ]
})
export class SesionModule { }
