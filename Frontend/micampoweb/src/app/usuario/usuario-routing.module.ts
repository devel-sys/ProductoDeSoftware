import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CamposComponent } from './campos/campos.component';
import { UsuarioComponent } from './usuario.component';

const routes: Routes = [
  {path: '', component: UsuarioComponent,
    children: [
      {path: '', pathMatch: 'full', redirectTo: 'mis-campos'},
      {path: 'mis-campos', component: CamposComponent},
      {path: '**', redirectTo: ''}
    ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioRoutingModule { }
