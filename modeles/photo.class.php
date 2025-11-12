<?php

class Photo {
    private ?int $idPhoto;
    private ?string $url;
    private ?int $idAnnonce;
    private ?int $idMessage;

    public function __construct(
        ?int $idPhoto = null,
        ?string $url = null,
        ?int $idAnnonce = null,
        ?int $idMessage = null
    ) {
        $this->idPhoto = $idPhoto;
        $this->url = $url;
        $this->idAnnonce = $idAnnonce;
        $this->idMessage = $idMessage;
    }

    public function getIdPhoto(): ?int { return $this->idPhoto; }
    public function setIdPhoto(?int $idPhoto): void { $this->idPhoto = $idPhoto; }

    public function getUrl(): ?string { return $this->url; }
    public function setUrl(?string $url): void { $this->url = $url; }

    public function getIdAnnonce(): ?int { return $this->idAnnonce; }
    public function setIdAnnonce(?int $idAnnonce): void { $this->idAnnonce = $idAnnonce; }

    public function getIdMessage(): ?int { return $this->idMessage; }
    public function setIdMessage(?int $idMessage): void { $this->idMessage = $idMessage; }
}
