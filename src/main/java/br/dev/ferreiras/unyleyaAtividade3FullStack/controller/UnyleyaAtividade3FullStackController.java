package br.dev.ferreiras.unyleyaAtividade3FullStack.controller;

import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.HttpStatusCode;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import br.dev.ferreiras.unyleyaAtividade3FullStack.model.UnyleyaAtividade3FullStackModel;

import br.dev.ferreiras.unyleyaAtividade3FullStack.repository.UnyleyaAtividade3FullStackRepository;

@CrossOrigin(origins = "http://localhost:8081")
@RestController
@RequestMapping("api")
public class UnyleyaAtividade3FullStackController {

  @Autowired
  UnyleyaAtividade3FullStackRepository unyleyaAtividade3FullStackRepository;

  @GetMapping("/produtos")
  public ResponseEntity<List<UnyleyaAtividade3FullStackModel>> getProdutos(
      @RequestParam(required = false) String nome) {
    try {
      List<UnyleyaAtividade3FullStackModel> produtos = new ArrayList<UnyleyaAtividade3FullStackModel>();
      if (nome == null) {
        unyleyaAtividade3FullStackRepository.findAll().forEach(produtos::add);
      } 
      if (produtos.isEmpty()) {
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
      }
      return new ResponseEntity<>(produtos, HttpStatus.OK);
    } catch (Exception e) {
      return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
    }
  };

  @GetMapping("produtos/{id}")
  public ResponseEntity<UnyleyaAtividade3FullStackModel> getProdutoById(@PathVariable("id") String id) {
      Optional<UnyleyaAtividade3FullStackModel> produtoById = unyleyaAtividade3FullStackRepository.findById(id);
      if (produtoById.isPresent()) {
        return new ResponseEntity<>(produtoById.get(), HttpStatus.OK);
      } else {
        return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
      }
  }

  @PostMapping("/produtos")
  public ResponseEntity<UnyleyaAtividade3FullStackModel> createProduto(@RequestBody UnyleyaAtividade3FullStackModel unyleyaAtividade3FullStackModel) {
    try {
      UnyleyaAtividade3FullStackModel _unyleyaAtividade3FullStackModel = unyleyaAtividade3FullStackRepository.
        save(new UnyleyaAtividade3FullStackModel(
          unyleyaAtividade3FullStackModel.getNome(), 
          unyleyaAtividade3FullStackModel.getDescricao(),
          unyleyaAtividade3FullStackModel.getCodigo(),
          unyleyaAtividade3FullStackModel.getPreco(),
          unyleyaAtividade3FullStackModel.getQuantidade()
          ));
      return new ResponseEntity<>(_unyleyaAtividade3FullStackModel, HttpStatus.CREATED);
    } catch (Exception e) {
      return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
    }
    
  }

  @PutMapping("/produtos/{id}")
  public ResponseEntity<UnyleyaAtividade3FullStackModel> updateProduto(@PathVariable("id") String id,@RequestBody UnyleyaAtividade3FullStackModel unyleyaAtividade3FullStackModel) {
    Optional<UnyleyaAtividade3FullStackModel> produtoById = unyleyaAtividade3FullStackRepository.findById(id);
    if (produtoById.isPresent() ) {
      UnyleyaAtividade3FullStackModel _unyleyaAtividade3FullStackModel = produtoById.get();
      _unyleyaAtividade3FullStackModel.setNome(unyleyaAtividade3FullStackModel.getNome());
      _unyleyaAtividade3FullStackModel.setDescricao(unyleyaAtividade3FullStackModel.getDescricao());
      _unyleyaAtividade3FullStackModel.setCodigo(unyleyaAtividade3FullStackModel.getCodigo());
      _unyleyaAtividade3FullStackModel.setPreco(unyleyaAtividade3FullStackModel.getPreco());
      _unyleyaAtividade3FullStackModel.setQuantidade(unyleyaAtividade3FullStackModel.getQuantidade());
      return new ResponseEntity<>(unyleyaAtividade3FullStackRepository.save(_unyleyaAtividade3FullStackModel), HttpStatus.OK);
    } else {
      return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
    }
  }

  @DeleteMapping("/produtos/{id}")
  public ResponseEntity<HttpStatus>deletaProduto(@PathVariable("id") String id) {
      try {
        unyleyaAtividade3FullStackRepository.deleteById(id);
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
      } catch ( Exception e) {
        return new ResponseEntity<>(HttpStatus.INTERNAL_SERVER_ERROR);
      
      }
    }

  @DeleteMapping("/produtos")
  public ResponseEntity<HttpStatus>deletaProdutos() {
      try {
        unyleyaAtividade3FullStackRepository.deleteAll();
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
      } catch ( Exception e) {
        return new ResponseEntity<>(HttpStatus.INTERNAL_SERVER_ERROR);
      }
  }
}
