import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UsuarioRegistroComponent } from './usuario-registro.component';
import { UsuarioRegistroRoutingModule } from './usuario-registro-routing.module';

@NgModule({
  declarations: [
    UsuarioRegistroComponent
  ],
  imports: [
    CommonModule,
    UsuarioRegistroRoutingModule
  ]
})
export class RegistroModule { }
