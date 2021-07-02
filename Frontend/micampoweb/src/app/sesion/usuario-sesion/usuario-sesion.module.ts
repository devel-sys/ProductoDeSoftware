import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UsuarioSesionRoutingModule } from './usuario-sesion-routing.module';
import { UsuarioSesionComponent } from './usuario-sesion.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MaterialModule } from 'src/app/material/material.module';


@NgModule({
  declarations: [
    UsuarioSesionComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    MaterialModule,
    UsuarioSesionRoutingModule
  ]
})
export class UsuarioSesionModule { }
