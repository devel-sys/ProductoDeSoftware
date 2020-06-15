import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UsuarioComponent } from './usuario.component';
import { MisCamposComponent } from '../mis-campos/mis-campos.component';


const routes: Routes = [
  {path:'usuario', component: UsuarioComponent,
children:[
  {path:'', pathMatch:'full', redirectTo:'misCampos'},
  {path:'misCampos', component: MisCamposComponent}
]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioRoutingModule { }
