import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UsuarioSesionComponent } from './usuario-sesion/usuario-sesion.component';
import { AdminSesionComponent } from './admin-sesion/admin-sesion.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AuthService } from '../services/auth.service';
import { MaterialModule } from '../material/material.module';

@NgModule({
  declarations: [
    UsuarioSesionComponent, 
    AdminSesionComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    MaterialModule
  ],
  providers: [AuthService]
})
export class SesionModule { }
