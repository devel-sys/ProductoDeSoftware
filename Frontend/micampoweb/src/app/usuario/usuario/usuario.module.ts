import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// Modulos
import { UsuarioRoutingModule } from './usuario-routing.module';
import { MatButtonModule, MatIconModule, MatListModule, MatSidenavModule, MatToolbarModule } from '@angular/material';

// Componentes
import { UsuarioComponent } from './usuario.component';
import { MenuOptionsComponent } from '../util/menu-options/menu-options.component';

@NgModule({
  declarations: [
    UsuarioComponent,
    MenuOptionsComponent
  ],
  imports: [
    CommonModule,
    UsuarioRoutingModule,
    MatSidenavModule,
    MatIconModule,
    MatToolbarModule,
    MatButtonModule,
    MatListModule
  ]
})

export class UsuarioModule { }
