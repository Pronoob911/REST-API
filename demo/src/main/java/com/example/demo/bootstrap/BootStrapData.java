package com.example.demo.bootstrap;

import org.springframework.stereotype.Component;
import com.example.demo.repositories.CustomerRepository;
import org.springframework.boot.CommandLineRunner;
import com.example.demo.domain.Customer;


@Component
public class BootStrapData implements CommandLineRunner {
    private final CustomerRepository customerRepository;

    public BootStrapData(CustomerRepository customerRepository) {
        this.customerRepository = customerRepository;
    }


    @Override
    public void run(String... args) throws Exception{

        System.out.println("Loading Customer Data");
        Customer c1= new Customer();
        c1.firstName="Micheal";
        c1.lastName="Weston";
        customerRepository.save(c1);

        Customer c2= new Customer();
        c2.firstName="Julia";
        c2.lastName="Adams";
        customerRepository.save(c2);

        Customer c3= new Customer();
        c3.firstName="Tom";
        c3.lastName="West";
        customerRepository.save(c3);

        System.out.println("customers saved:"+ customerRepository.count());

    }





}
