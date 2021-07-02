import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UsuarioRegistroComponent } from './usuario-registro.component';

const routes: Routes = [
  {path: '', component: UsuarioRegistroComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioRegistroRoutingModule { }
