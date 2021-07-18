<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlimentRepository")
 * @Vich\Uploadable
 */
class Aliment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=15,minMessage="le nom doit faire 3 caractères minimum", maxMessage="Le nom doit faire moins de 15 caractères")
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
<<<<<<< HEAD
     * @Assert\Range(
     *      min = 1,
     *      max = 100,
     *      notInRangeMessage = "Le prix doit être {{ min }} euro(s) et {{ max }} euro(s).",
     * )
=======
     * @Assert\Range(min=0.1, max=100, minMessage="Le prix doit être supérieur à 0.1", maxMessage="Le prix doit être inférieur à 100")
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
<<<<<<< HEAD
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="aliment_image", fileNameProperty="image")
     * @var File|null
     */
    private $imageFile;


=======
    * @Vich\UploadableField(mapping="aliment_image", fileNameProperty="image")
    */
    private $imageFile;

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;

        if($this->imageFile instanceof UploadedFile){
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

    /**
     * @ORM\Column(type="integer")
     */
<<<<<<< HEAD
    private $calories;
=======
    private $calorie;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

    /**
     * @ORM\Column(type="float")
     */
<<<<<<< HEAD
    private $proteines;
=======
    private $proteine;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

    /**
     * @ORM\Column(type="float")
     */
<<<<<<< HEAD
    private $glucides;
=======
    private $glucide;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

    /**
     * @ORM\Column(type="float")
     */
<<<<<<< HEAD
    private $lipides;
=======
    private $lipide;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

<<<<<<< HEAD


=======
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

<<<<<<< HEAD
    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime("now");
        }
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): self
    {
        $this->calories = $calories;
=======
    public function getCalorie(): ?int
    {
        return $this->calorie;
    }

    public function setCalorie(int $calorie): self
    {
        $this->calorie = $calorie;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

        return $this;
    }

<<<<<<< HEAD
    public function getProteines(): ?float
    {
        return $this->proteines;
    }

    public function setProteines(float $proteines): self
    {
        $this->proteines = $proteines;
=======
    public function getProteine(): ?float
    {
        return $this->proteine;
    }

    public function setProteine(float $proteine): self
    {
        $this->proteine = $proteine;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

        return $this;
    }

<<<<<<< HEAD
    public function getGlucides(): ?float
    {
        return $this->glucides;
    }

    public function setGlucides(float $glucides): self
    {
        $this->glucides = $glucides;
=======
    public function getGlucide(): ?float
    {
        return $this->glucide;
    }

    public function setGlucide(float $glucide): self
    {
        $this->glucide = $glucide;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

        return $this;
    }

<<<<<<< HEAD
    public function getLipides(): ?float
    {
        return $this->lipides;
    }

    public function setLipides(float $lipides): self
    {
        $this->lipides = $lipides;
=======
    public function getLipide(): ?float
    {
        return $this->lipide;
    }

    public function setLipide(float $lipide): self
    {
        $this->lipide = $lipide;
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581

        return $this;
    }

<<<<<<< HEAD
    public function getUpdatedAt(): ?\DateTimeImmutable
=======
    public function getUpdatedAt(): ?\DateTimeInterface
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
    {
        return $this->updated_at;
    }

<<<<<<< HEAD
    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
=======
    public function setUpdatedAt(\DateTimeInterface $updated_at): self
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
