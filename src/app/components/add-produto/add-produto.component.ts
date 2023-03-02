import { Component, OnInit } from '@angular/core';
import { Produto } from 'src/app/models/produto.model';
import { ProdutoService } from 'src/app/services/produto.service';

@Component({
  selector: 'app-add-produto',
  templateUrl: './add-produto.component.html',
  styleUrls: ['./add-produto.component.css']
})
export class AddProdutoComponent implements OnInit{
  produto: Produto = {
    nome: '',
    descricao: '',
    codigo: '',
    preco: 0,
    quantidade: 0
  };
  submitted = false;

  constructor(private produtoService: ProdutoService) { }

  ngOnInit(): void {
  }

  saveProduto(): void {
    const data = {
      nome: this.produto.nome,
      descricao: this.produto.descricao,
      codigo: this.produto.codigo,
      preco: this.produto.preco,
      quantidade: this.produto.quantidade
    };

    this.produtoService.create(data)
      .subscribe({
        next: (res) => {
          console.log(res);
          this.submitted = true;
        },
        error: (e) => console.error(e)
      });
  }

  newProduto(): void {
    this.submitted = false;
    this.produto = {
      nome: '',
      descricao: '',
      codigo: '',
      quantidade: 0,
      preco: 0
    };
  }



}
