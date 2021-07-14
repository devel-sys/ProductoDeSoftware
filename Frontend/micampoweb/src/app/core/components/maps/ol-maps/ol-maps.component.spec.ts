import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OlMapsComponent } from './ol-maps.component';

describe('OlMapsComponent', () => {
  let component: OlMapsComponent;
  let fixture: ComponentFixture<OlMapsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OlMapsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OlMapsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
