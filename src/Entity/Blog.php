<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\File\File;
use DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 * @Vich\Uploadable
 */
class Blog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="text")
     */
    private $Text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Summary;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Createdate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Editdate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="blogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Madeby;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Active;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="blog_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $updatedAt;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): self
    {
        $this->Text = $Text;
        $this->Createdate = new \DateTime( 'now');

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->Summary;
    }

    public function setSummary(string $Summary): self
    {
        $this->Summary = $Summary;

        return $this;
    }

    public function getCreatedate(): ?\DateTimeInterface
    {
        return $this->Createdate;
    }

    public function setCreatedate(\DateTimeInterface $Createdate): self
    {
        $this->Createdate = $Createdate;

        return $this;
    }

    public function getEditdate(): ?\DateTimeInterface
    {
        return $this->Editdate;
    }

    public function setEditdate(\DateTimeInterface $Editdate): self
    {
        $this->Editdate = $Editdate;

        return $this;
    }

    public function getMadeby(): ?User
    {
        return $this->Madeby;
    }

    public function setMadeby(?User $Madeby): self
    {
        $this->Madeby = $Madeby;

        return $this;
    }
    public function __construct()
    {
        $this->Createdate = new \DateTime();
        $this->Editdate = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(?bool $Active): self
    {
        $this->Active = $Active;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function __toString(): string{
        return $this->getImage();
    }

}
