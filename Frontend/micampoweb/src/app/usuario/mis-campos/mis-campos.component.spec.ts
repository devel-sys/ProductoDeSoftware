import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MisCamposComponent } from './mis-campos.component';

describe('MisCamposComponent', () => {
  let component: MisCamposComponent;
  let fixture: ComponentFixture<MisCamposComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MisCamposComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MisCamposComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
