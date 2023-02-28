package br.dev.ferreiras.unyleyaAtividade3FullStack.repository;

import java.util.List;
import org.springframework.data.mongodb.repository.MongoRepository;
import br.dev.ferreiras.unyleyaAtividade3FullStack.model.UnyleyaAtividade3FullStackModel;


public interface UnyleyaAtividade3FullStackRepository extends MongoRepository<UnyleyaAtividade3FullStackModel, String> {
  
}
