<?php

namespace App\Entity\User;

use App\Entity\Buddy\BuddyRequest;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use ReflectionException;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\VarDumper\VarDumper;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Vich\Uploadable]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $name = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(type: 'string', nullable: true)]
    private $ageRange = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $modality = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $category = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private $writingTopic = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private $readingTopic = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private $favoriteWriters = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $frecuency = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $country = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private $language = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: BuddyRequest::class, orphanRemoval: true)]
    private Collection $buddyRequests;

    #[ORM\OneToMany(mappedBy: 'buddy', targetEntity: BuddyRequest::class, orphanRemoval: true)]
    private Collection $buddyRequestReceived;

    #[ORM\Column(type: 'string', nullable: true)]
    private $bio = null;

    #[Vich\UploadableField(mapping: 'profile', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $imageSize = null;

    public function __construct()
    {
        $this->buddyRequests = new ArrayCollection();
        $this->buddyRequestReceived = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword():? string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return null
     */
    public function getAgeRange()
    {
        return $this->ageRange;
    }

    /**
     * @param null $ageRange
     */
    public function setAgeRange($ageRange): void
    {
        if(!in_array($ageRange, AgeRangeType::getConstants())) {
            return ;
        }
        $this->ageRange = $ageRange;
    }

    /**
     * @return null
     */
    public function getModality()
    {
        return $this->modality;
    }

    /**
     * @param null $modality
     */
    public function setModality($modality): void
    {
        if(!in_array($modality, ModalityType::getConstants())) {
            return ;
        }
        $this->modality = $modality;
    }

    /**
     * @return null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param null $category
     */
    public function setCategory($category): void
    {
        if(!in_array($category, CategoryType::getConstants())) {
            return ;
        }
        $this->category = $category;
    }

    /**
     * @return null
     */
    public function getWritingTopic()
    {
        return $this->writingTopic;
    }

    /**
     * @param string[] $writingTopic
     * @throws ReflectionException
     */
    public function setWritingTopic(array $writingTopic): void
    {
        if( count(array_diff($writingTopic, TopicType::getConstants())) > 0){
            return ;
        }
        $this->writingTopic = $writingTopic;
    }

    /**
     * @return null
     */
    public function getReadingTopic()
    {
        return $this->readingTopic;
    }

    /**
     * @param null $readingTopic
     */
    public function setReadingTopic($readingTopic): void
    {
        if( count(array_diff($readingTopic, TopicType::getConstants())) > 0){
            return ;
        }
        $this->readingTopic = $readingTopic;
    }

    /**
     * @return null
     */
    public function getFavoriteWriters()
    {
        return $this->favoriteWriters;
    }

    /**
     * @param string[] $favoriteWriters
     */
    public function setFavoriteWriters(array $favoriteWriters): void
    {
        $this->favoriteWriters = $favoriteWriters;
    }

    /**
     * @return null
     */
    public function getFrecuency()
    {
        return $this->frecuency;
    }

    /**
     * @param null $frecuency
     */
    public function setFrecuency($frecuency): void
    {
        if(!in_array($frecuency, FrequencyType::getConstants())) {
            return ;
        }
        $this->frecuency = $frecuency;
    }

    /**
     * @return null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param null $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param null $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    /**
     * @return Collection<int, BuddyRequest>
     */
    public function getBuddyRequests(): Collection
    {
        return $this->buddyRequests;
    }

    public function addBuddyRequest(BuddyRequest $buddyRequest): self
    {
        if (!$this->buddyRequests->contains($buddyRequest)) {
            $this->buddyRequests->add($buddyRequest);
            $buddyRequest->setUser($this);
        }

        return $this;
    }

    public function removeBuddyRequest(BuddyRequest $buddyRequest): self
    {
        if ($this->buddyRequests->removeElement($buddyRequest)) {
            // set the owning side to null (unless already changed)
            if ($buddyRequest->getUser() === $this) {
                $buddyRequest->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BuddyRequest>
     */
    public function getBuddyRequestReceived(): Collection
    {
        return $this->buddyRequestReceived;
    }

    public function addBuddyRequestReceived(BuddyRequest $buddyRequestReceived): self
    {
        if (!$this->buddyRequestReceived->contains($buddyRequestReceived)) {
            $this->buddyRequestReceived->add($buddyRequestReceived);
            $buddyRequestReceived->setBuddy($this);
        }

        return $this;
    }

    public function removeBuddyRequestReceived(BuddyRequest $buddyRequestReceived): self
    {
        if ($this->buddyRequestReceived->removeElement($buddyRequestReceived)) {
            // set the owning side to null (unless already changed)
            if ($buddyRequestReceived->getBuddy() === $this) {
                $buddyRequestReceived->setBuddy(null);
            }
        }

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @return null
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param null $bio
     */
    public function setBio($bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return string|null
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @param string|null $imageName
     */
    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    /**
     * @return int|null
     */
    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    /**
     * @param int|null $imageSize
     */
    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }



    public function __serialize()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'roles' => $this->roles,
            'password' => $this->password,
            'is_verified' => $this->isVerified,
            'age_range' => $this->ageRange,
            'modality' => $this->modality,
            'category' => $this->category,
            'writing_topic' => $this->writingTopic,
            'reading_topic' => $this->readingTopic,
            'favorite_writers' => $this->favoriteWriters,
            'frequency' => $this->frecuency,
            'country' => $this->country,
            'language' => $this->language,
            'bio' => $this->bio,
            'image_name' => $this->imageName,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public function __unserialize($serialized)
    {
        $this->id = $serialized['id'];
        $this->email = $serialized['email'];
        $this->roles = $serialized['roles'];
        $this->password = $serialized['password'];
        $this->isVerified = $serialized['is_verified'];
        $this->ageRange = $serialized['age_range'];
        $this->modality = $serialized['modality'];
        $this->category = $serialized['category'];
        $this->writingTopic = $serialized['writing_topic'];
        $this->readingTopic = $serialized['reading_topic'];
        $this->favoriteWriters = $serialized['favorite_writers'];
        $this->frecuency = $serialized['frequency'];
        $this->country = $serialized['country'];
        $this->language = $serialized['language'];
        $this->bio = $serialized['bio'];
        $this->imageName = $serialized['image_name'];
        $this->createdAt = $serialized['created_at'];
        $this->updatedAt = $serialized['updated_at'];
        return $this;
    }

}
