import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UsuarioComponent } from './usuario.component';
import { MisCamposComponent } from '../mis-campos/mis-campos.component';
import { SesionComponent } from '../sesion/sesion.component';
import { RegistroComponent } from '../registro/registro.component';


const routes: Routes = [
  {path: 'usuario', component: UsuarioComponent,
children: [
  {path: '', pathMatch: 'full', redirectTo: 'misCampos'},
  {path: 'misCampos', component: MisCamposComponent},
]},
{path: 'sesion', component: SesionComponent},
{path: 'registro', component: RegistroComponent}

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioRoutingModule { }
