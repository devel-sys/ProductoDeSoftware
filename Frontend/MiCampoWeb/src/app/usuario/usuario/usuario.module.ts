import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UsuarioRoutingModule } from './usuario-routing.module';
import { LoginUsuarioComponent } from '../login-usuario/login-usuario.component';
import { UsuarioComponent } from './usuario.component';
import { MisCamposComponent } from '../mis-campos/mis-campos.component';


@NgModule({
  declarations: [
    LoginUsuarioComponent,
    UsuarioComponent,
    MisCamposComponent
  ],
  imports: [
    CommonModule,
    UsuarioRoutingModule
  ]
})
export class UsuarioModule { }
