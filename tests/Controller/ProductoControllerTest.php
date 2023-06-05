<?php

namespace App\Test\Controller;

use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductoControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/producto/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Producto::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Producto index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'producto[codigo]' => 'Testing',
            'producto[descripcionProducto]' => 'Testing',
            'producto[precio]' => 'Testing',
            'producto[stock]' => 'Testing',
            'producto[iva]' => 'Testing',
            'producto[peso]' => 'Testing',
            'producto[idMarca]' => 'Testing',
            'producto[idZona]' => 'Testing',
            'producto[idPresentacion]' => 'Testing',
            'producto[idProveedor]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Producto();
        $fixture->setCodigo('My Title');
        $fixture->setDescripcionProducto('My Title');
        $fixture->setPrecio('My Title');
        $fixture->setStock('My Title');
        $fixture->setIva('My Title');
        $fixture->setPeso('My Title');
        $fixture->setIdMarca('My Title');
        $fixture->setIdZona('My Title');
        $fixture->setIdPresentacion('My Title');
        $fixture->setIdProveedor('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Producto');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Producto();
        $fixture->setCodigo('Value');
        $fixture->setDescripcionProducto('Value');
        $fixture->setPrecio('Value');
        $fixture->setStock('Value');
        $fixture->setIva('Value');
        $fixture->setPeso('Value');
        $fixture->setIdMarca('Value');
        $fixture->setIdZona('Value');
        $fixture->setIdPresentacion('Value');
        $fixture->setIdProveedor('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'producto[codigo]' => 'Something New',
            'producto[descripcionProducto]' => 'Something New',
            'producto[precio]' => 'Something New',
            'producto[stock]' => 'Something New',
            'producto[iva]' => 'Something New',
            'producto[peso]' => 'Something New',
            'producto[idMarca]' => 'Something New',
            'producto[idZona]' => 'Something New',
            'producto[idPresentacion]' => 'Something New',
            'producto[idProveedor]' => 'Something New',
        ]);

        self::assertResponseRedirects('/producto/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCodigo());
        self::assertSame('Something New', $fixture[0]->getDescripcionProducto());
        self::assertSame('Something New', $fixture[0]->getPrecio());
        self::assertSame('Something New', $fixture[0]->getStock());
        self::assertSame('Something New', $fixture[0]->getIva());
        self::assertSame('Something New', $fixture[0]->getPeso());
        self::assertSame('Something New', $fixture[0]->getIdMarca());
        self::assertSame('Something New', $fixture[0]->getIdZona());
        self::assertSame('Something New', $fixture[0]->getIdPresentacion());
        self::assertSame('Something New', $fixture[0]->getIdProveedor());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Producto();
        $fixture->setCodigo('Value');
        $fixture->setDescripcionProducto('Value');
        $fixture->setPrecio('Value');
        $fixture->setStock('Value');
        $fixture->setIva('Value');
        $fixture->setPeso('Value');
        $fixture->setIdMarca('Value');
        $fixture->setIdZona('Value');
        $fixture->setIdPresentacion('Value');
        $fixture->setIdProveedor('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/producto/');
        self::assertSame(0, $this->repository->count([]));
    }
}
