import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { NovedadesComponent } from '../novedades/novedades.component';
import { PrincipalComponent } from '../principal/principal.component';
import { AdminSesionComponent } from '../sesion/admin-sesion/admin-sesion.component';
import { UsuarioSesionComponent } from '../sesion/usuario-sesion/usuario-sesion.component';

const routes: Routes = [
  {path: '', component: PrincipalComponent},
  {path: 'sign-in', component: UsuarioSesionComponent},
  {path: 'admin-sign-in', component: AdminSesionComponent},
  {path: 'novedades', component: NovedadesComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class RouteModule { }
